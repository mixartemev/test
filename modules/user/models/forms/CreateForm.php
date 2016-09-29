<?php

namespace app\modules\user\models\forms;

use app\modules\user\models\User;
use yii\base\Model;
use Yii;

class CreateForm extends Model
{
	public $email;
	public $password;

	/**
	 * @var User
	 */
	private $_user;

	/**
	 * @param array $config
	 */
	public function __construct($config = [])
	{
		$this->_user = new User();
		parent::__construct($config);
	}

	public function rules()
	{
		return [
			['email', 'required'],
			['email', 'email'],
			[
				'email',
				'unique',
				'targetClass' => User::className(),
				'message' => 'ERROR_EMAIL_EXISTS',
			],
			['email', 'string', 'max' => 255],

			['password', 'required'],
			['password', 'string', 'min' => 6],
		];
	}

	/**
	 * @return bool
	 */
	public function create()
	{
		if ($this->validate()) {
			$user = $this->_user;
			$user->email = $this->email;
			$user->setPassword($this->password);
			return $user->save();
		} else {
			return false;
		}
	}
} 