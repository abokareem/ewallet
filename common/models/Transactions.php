<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $sender_wallet_id
 * @property int $recipient_wallet_id
 * @property double $sender_currency_amount
 * @property double $recipient_currency_amount
 * @property string $timestamp
 *
 * @property UsersWallets $senderWallet
 * @property UsersWallets $recipientWallet
 * @property Users $senderemail
 * @property Users $recipientemail
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $recipient_wallet_after_balance;

    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender_wallet_id', 'recipient_wallet_id', 'sender_currency_amount', 'recipient_currency_amount'], 'required'],
            [['sender_wallet_id', 'recipient_wallet_id'], 'integer'],
            [['sender_currency_amount', 'recipient_currency_amount'], 'number'],
            [['timestamp'], 'safe'],
            [['sender_wallet_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersWallets::className(), 'targetAttribute' => ['sender_wallet_id' => 'id']],
            [['recipient_wallet_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersWallets::className(), 'targetAttribute' => ['recipient_wallet_id' => 'id']],
            [['senderemail', 'recipientemail', 'senderwalletcurrency', 'recipientwalletcurrency', 'senderwalletname', 'recipientwalletname', 'senderwalletusersemail', 'recipient_wallet_after_balance' ], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Transaction ID',
            'sender_wallet_id' => 'Sender`s Wallet ID',
            'recipient_wallet_id' => 'Recipient`s Wallet ID',
            'sender_currency_amount' => 'Sender Currency Amount',
            'recipient_currency_amount' => 'Recipient Currency Amount',
            'timestamp' => 'Timestamp',
            'recipient_wallet_after_balance' => 'Recipient`s wallet balance after transaction in sender wallet currency'
            // 'senderwalletname' => 'senderwalletname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getCurrency()
    // {
    //     return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    // }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSenderWallet()
    {
        return $this->hasOne(UsersWallets::className(), ['id' => 'sender_wallet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipientWallet()
    {
        return $this->hasOne(UsersWallets::className(), ['id' => 'recipient_wallet_id']);
    }


}
