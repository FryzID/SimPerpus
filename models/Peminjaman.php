<?php

namespace app\models;

use app\models\User as ModelsUser;
use dektrium\user\models\User;
use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int $id_buku
 * @property int $id_admin
 * @property string $tanggal_peminjaman
 *
 * @property User $admin
 * @property Buku $buku
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_admin',], 'required'],
            [['id_buku', 'id_admin', 'id_rak'], 'integer'],
            [['tanggal_peminjaman'], 'safe'],
            [['id_rak'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['id_rak' => 'id']],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['id_buku' => 'id']],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_admin' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Id Buku',
            'id_admin' => 'Id Admin',
            'tanggal_peminjaman' => 'Tanggal Peminjaman',
        ];
    }

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id' => 'id_admin']);
    }

    /**
     * Gets query for [[Buku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuku()
    {
        return $this->hasOne(Buku::className(), ['id' => 'id_buku']);
    }

    public function getRak()
    {
        return $this->hasOne(Rak::className(), ['id' => 'id_rak']);
    }
}
