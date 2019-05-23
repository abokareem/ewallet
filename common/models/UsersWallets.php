<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users_wallets".
 *
 * @property int $id
 * @property string $name
 * @property int $users_id
 * @property int $currency_id
 * @property double $amount
 *
 * @property Currency $currency
 * @property Users $users
 */
class UsersWallets extends \yii\db\ActiveRecord
{
    
    public $senderId;
    public $recipientId;
    public $currencyname;
    public $useremail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_wallets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_id', /*'currency_id',*/ 'amount'], 'required'],
            [['users_id', 'currency_id'], 'integer'],
            [['amount'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Wallet`s ID',
            'name' => 'Wallet name',
            'users_id' => 'User`s ID',
            'currency_id' => 'Currency ID',
            'currencyname' => 'Currency Name',     //
            'useremail' => 'User`s email',     //
            'amount' => 'Wallet balance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }


    // public function getName()
    // {
    //     return $this->hasOne(Currency::className(), ['currency_id' => 'id']);
    // }

    public function getEmail()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['sender_wallet_id' =>'id', 'recipient_wallet_id' => 'id']);
    }

    public function getSenderId()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    public function getRecipientId()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }
}
