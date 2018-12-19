<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\PesananForm;
use frontend\models\UploadBuktiForm;
use yii\helpers\ArrayHelper;
use common\models\Lapangan;
use common\models\SesiWaktu;
use yii\web\UploadedFile;
use common\models\Booking;
use common\models\BookingSearch;


class PesananController extends Controller
{

  /**
   * Data Pesanan.
   * @return mixed
   */
   public function actionIndex()
   {
       $searchModel = new BookingSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       $dataProvider->query->where(['id_pemesan' => Yii::$app->user->identity->id]);
       // echo "<pre>";print_r($dataProvider->getModels());exit();
       // echo "<pre>";print_r($dataProvider->query->where(['id_pemesan' => Yii::$app->user->identity->id]));exit();

       return $this->render('index', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
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

        if ($model->load(Yii::$app->request->post())) {
            if ($book = $model->pesan()) {
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

    public function actionUploadBukti($id)
    {

        if (Yii::$app->user->isGuest) {

            return $this->goHome();
        }
        $pemesan = Yii::$app->user->identity->getId();
        $model = new UploadBuktiForm();
        // $data = Booking::findOne($id);
        $data = Booking::findOne(['id' => $id, 'id_pemesan' => $pemesan]);

        if($data == null){
          Yii::$app->session->setFlash('error', 'Tidak ada pesanan tersebut.');
          return $this->redirect('index');
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->bukti_transfer = UploadedFile::getInstance($model, 'bukti_transfer');
            if ($user = $model->konfirmasi($id)) {
                // echo "<pre>";print_r($data);exit();
                $data->statusBayar();
                $data->save(false);
                Yii::$app->session->setFlash('success', 'Bukti transfer berhasil terkirim.');
                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', 'Gagal mengirim, mohon teliti kembali.');
            }
        }

        return $this->render('upload-bukti', [
          'model'   => $model,
          'data'   => $data,
     ]);
    }
}
