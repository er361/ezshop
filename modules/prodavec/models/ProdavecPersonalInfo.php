<?php

namespace app\modules\prodavec\models;

use Yii;

/**
 * This is the model class for table "prodavec_personal_info".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $second_name
 * @property string $company_name
 * @property string $brands
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $user_id
 */
class ProdavecPersonalInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prodavec_personal_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['first_name', 'second_name', 'company_name', 'brands', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'company_name' => 'Company Name',
            'brands' => 'Brands',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'user_id' => 'User ID',
        ];
    }

}