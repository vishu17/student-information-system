<?php

class Profile implements IProfile
{
	private $username;
	private $fullName;
	private $password;
	private $email;
	private $role;
	private $dateJoined;
	private $lastLogin;
	private $phoneNumber;
	private $user;
	private $all;
	private $session;

	public function __construct(IUser $user, Session $session)
	{
		$this->session = $session;
		$username = $session->get('login');
		$this->user = $user;
		$this->all = $this->user->find($username);
		$this->all = $this->user->getUserData();
		$userData = $this->getAll();
		$this->username = $username;
		$this->fullName = (
			$userData->get('first_name') . ' ' . $userData->get('middle_name') . ' ' . $userData->get('last_name')
		);
		$this->password = $userData->get('password');
		$this->email = $userData->get('email');
		$this->role = $userData->get('role');
		$this->dateJoined = $userData->get('joined');
		$this->lastLogin = $userData->get('last_login');
		$this->phoneNumber = $userData->get('phone_number');
	}

	public function getUsername() :string
	{
		return $this->username;
	}

	public function getFullName() :string
	{
		return $this->fullName;
	}

	public function getPassword() :string
	{
		return $this->password;
	}

	public function getEmail() :string
	{
		return $this->email;
	}

	public function getRole() :string
	{
		return $this->role;
	}

	public function getDateJoined() :string
	{
		return $this->dateJoined;
	}

	public function getLastLogin() :string
	{
		return $this->lastLogin;
	}

	public function getPhoneNumber() :string
	{
		return $this->phoneNumber;
	}

	public function getAll() :IRequestData
	{
		return new RequestData($this->all);
	}
}
