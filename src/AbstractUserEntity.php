<?php
namespace Security\Entity\Doctrine;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Mouf\Security\UserService\UserInterface;

abstract class AbstractUserEntity implements UserInterface {

	/**
	 * @var int
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	protected $id;

	/**
	 * @var string
	 * @Column(type="string", unique=true)
	 */
	protected $email;

	/**
	 * @var string
	 * @Column(type="string", unique=true)
	 */
	protected $login;

	/**
	 * @var string
	 * @Column(type="string")
	 */
	protected $password;

	/**
	 * @var string
	 * @Column(type="string", nullable= true)
	 */
	protected $token = null;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return string
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param string $token
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * @param string $login
	 */
	public function setLogin($login) {
		if (empty($login)) {
			throw new \InvalidArgumentException("Must provide a login");
		}
		$this->login = $login;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		if (empty($password)) {
			throw new \InvalidArgumentException("Must provide a password");
		}
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}
}
