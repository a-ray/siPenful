<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\PesananForm;
use frontend\models\UploadBuktiForm;
use yii\helpers\ArrayHelper;
use common\models\Lapangan;
use common\models\SesiWaktu;

class PesananController extends Controller
{

  /**
   * Data Pesanan.
   * @return mixed
   */
    public function actionIndex()
    {
        return $this->render('index', [
        // 'model' => $model,
      ]);
    }

    /**
     * Pesan Lapangan.
     * @return mixed
     */
    public function actionPesan()
    {
        $model = new PesananForm();
        $data = ArrayHelper::map(Lapangan::find()->select(['id', 'nama'])->all(), 'id', 'nama');
        $sesi = ArrayHelper::map(SesiWaktu::find()->select(['id', 'tampil'])->all(), 'id', 'tampil');

        if($model->load(Yii::$app->request->post())){
          if($book = $model->pesan()){
            Yii::$app->session->setFlash('success', 'Berhasil Memesan Lapangan');

            return $this->redirect('index');
          }
        }

        return $this->render('pesan', [
          'model' => $model,
          'data' => $data,
          'sesi' => $sesi,
        ]);
    }

    public function actionUploadBukti(){
      if (!Yii::$app->user->isGuest) {
          return $this->goHome();
      }

      $model = new UploadBuktiForm();

    }

}
