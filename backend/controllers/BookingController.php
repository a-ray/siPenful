<?php

namespace backend\controllers;

use Yii;
use common\models\Booking;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use common\models\Lapangan;
use yii\helpers\ArrayHelper;
use common\models\SesiWaktu;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Booking #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit', ['update','id'=>$id], ['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Updates an existing Booking model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionValidasi($id)
    {
        $request = Yii::$app->request;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

          if($model->status != 2){
            // echo "<pre>";print_r($model);exit;
            Yii::$app->session->setFlash('error', [['Error', 'Gagal melakukan validasi']]);

            return $this->redirect('index');

          }
          if (!$model->validate()) {
            echo "<pre>";print_r($model);exit;

            return null;

          }
          echo "<pre>";print_r($model);exit;

            $model->status = 10;
            $model->save(false);
            Yii::$app->session->setFlash('success', [['Sukses', 'Berhasil melakukan validasi']]);

            return $this->redirect('index');
        }

        return $this->render('validasi', [
          'model' => $model,
        ]);
    }
    
    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
