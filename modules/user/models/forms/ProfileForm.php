<?php

namespace app\modules\user\models\forms;

use app\modules\user\models\User;
use yii\base\Model;

/**
 * Password reset form
 */
class ProfileForm extends Model
{
    public $password;

    /**
     * @var User
     */
    private $_user;

    /**
     * @param User $user
     * @param array $config
     */
    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Новый пароль'
        ];
    }

    /**
     * @return boolean
     */
    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->setPassword($this->password);
            return $user->save();
        } else {
            return false;
        }
    }
}