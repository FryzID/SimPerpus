<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $judul
 * @property string $pengarang
 * @property string $penerbit
 * @property string $tahun_terbit
 * @property int $id_rak
 *
 * @property Peminjaman[] $peminjamen
 * @property Rak $rak
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'pengarang', 'penerbit', 'tahun_terbit', 'id_rak'], 'required'],
            [['tahun_terbit'], 'safe'],
            [['id_rak'], 'integer'],
            [['gambar_buku'], 'file','skipOnEmpty' => true, 'extensions'=>'jpg, gif, png ,doc, txt, pdf ,docx ,rar ,zip ,xls ,xlsx ,rtf',],
            [['judul', 'pengarang', 'penerbit'], 'string', 'max' => 45],
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
            'judul' => 'Judul',
            'pengarang' => 'Pengarang',
            'penerbit' => 'Penerbit',
            'tahun_terbit' => 'Tahun Terbit',
            'id_rak' => 'Id Rak',
            'gambar_buku' => 'Gambar Buku',
        ];
    }

    /**
     * Gets query for [[Peminjamen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['id_buku' => 'id']);
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
