<?php

namespace CT275\Labs;

use PDO;

class Contact
{
	private  $db;

	private $id = -1;
	public $name;
	public $gia; //
	public $anh; //
	public $chitiet; //
	public $created_at;
	public $updated_at;
	private $errors = [];

	public function getId()
	{
		return $this->id;
	}

	public function __construct(PDO $pdo)
	{
		$this->db = $pdo;
	}

	public function fill(array $data)
	{
		if (isset($data['name'])) {
			$this->name = trim($data['name']);
		}

		if (isset($data['gia'])) {
			$this->gia = preg_replace('/[^0-9]+/', '', $data['gia']);
		}

		if (isset($data['chitiet'])) {
			$this->chitiet = trim($data['chitiet']);
		}

		return $this;
	}

	public function getValidationErrors()
	{
		return $this->errors;
	}

	public function validate()
	{
		if (!$this->name) {
			$this->errors['name'] = 'Invalid name.';
		}

		if (!$this->gia) {
			$this->errors['gia'] = 'Invalid gia number.';
		}

		if (strlen($this->chitiet) > 255) {
			$this->errors['chitiet'] = 'Notes must be at most 255 characters.';
		}

		return empty($this->errors);
	}

	public function all()
	{
		$contacts = [];

		$stmt = $this->db->prepare('select * from contacts');

		$stmt->execute();

		while ($row = $stmt->fetch()) {
			$contact = new Contact($this->db);
			$contact->fillFromDB($row);
			$contacts[] = $contact;
		}

		return $contacts;
	}
	protected function fillFromDB(array $row)
	{
		$this->id = $row['id'];
		// $this->anh = $row['anh'];
		$this->name = $row['name'];
		$this->gia = $row['gia'];
		$this->chitiet = $row['chitiet'];
		$this->created_at = $row['created_at'];
		$this->updated_at = $row['updated_at'];
		return $this;
	}
	public function save()
	{
		$result = false;
		if ($this->id >= 0) {
			$stmt = $this->db->prepare('update contacts set name = :name,
gia = :gia, chitiet = :chitiet, updated_at = now()
where id = :id');
			$result = $stmt->execute([
				'anh' =>$this->anh,
				'name' => $this->name,
				'gia' => $this->gia,
				'chitiet' => $this->chitiet,
				'id' => $this->id
			]);
		} else {
			$stmt = $this->db->prepare(
				'insert into contacts (name, gia, chitiet, created_at, updated_at)
values (:name, :gia, :$chitiet, now(), now())'
			);
			$result = $stmt->execute([
				'anh' =>$this->anh,
				'name' => $this->name,
				'gia' => $this->gia,
				'chitiet' => $this->chitiet
			]);
			if ($result) {
				$this->id = $this->db->lastInsertId();
			}
		}
		return $result;
	}

	public function find($id)
	{
		$stmt = $this->db->prepare('select * from contacts where id=:id');
		$stmt->execute(['id' => $id]);

		if ($row = $stmt->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}

		return null;
	}

	public function update(array $data)
	{
		$this->fill($data);
		if ($this->validate()) {
			return $this->save();
		}
		return false;
	}

	public function delete()
	{
		$stmt = $this->db->prepare('delete from contacts where id=:id');
		return $stmt->execute(['id' => $this->id]);
	}
}
