<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_peminjaman".
 *
 * @property int $id
 * @property int $id_rak
 * @property int $id_buku
 * @property int $id_peminjaman
 * @property string $tanggal_peminjaman
 *
 * @property Buku $buku
 * @property Peminjaman $peminjaman
 * @property Rak $rak
 */
class DataPeminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rak', 'id_buku', 'id_peminjaman', 'tanggal_peminjaman'], 'required'],
            [['id_rak', 'id_buku', 'id_peminjaman'], 'integer'],
            [['tanggal_peminjaman'], 'safe'],
            [['id_peminjaman'], 'exist', 'skipOnError' => true, 'targetClass' => Peminjaman::className(), 'targetAttribute' => ['id_peminjaman' => 'id']],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['id_buku' => 'id']],
            [['id_rak'], 'exist', 'skipOnError' => true, 'targetClass' => Rak::className(), 'targetAttribute' => ['id_rak' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_rak' => 'Id Rak',
            'id_buku' => 'Id Buku',
            'id_peminjaman' => 'Id Peminjaman',
            'tanggal_peminjaman' => 'Tanggal Peminjaman',
        ];
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

    /**
     * Gets query for [[Peminjaman]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjaman()
    {
        return $this->hasOne(Peminjaman::className(), ['id' => 'id_peminjaman']);
    }

    /**
     * Gets query for [[Rak]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRak()
    {
        return $this->hasOne(Rak::className(), ['id' => 'id_rak']);
    }
}
