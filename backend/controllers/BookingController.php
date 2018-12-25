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
     * Creates a new Booking model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Booking();
        $data = ArrayHelper::map(Lapangan::find()->select(['id', 'nama'])->all(), 'id', 'nama');

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title'=> "Create new Booking",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save', ['class'=>'btn btn-primary','type'=>"submit"])

                ];
            } elseif ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Booking",
                    'content'=>'<span class="text-success">Create Booking success</span>',
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More', ['create'], ['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            } else {
                return [
                    'title'=> "Create new Booking",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save', ['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'data' => $data,
                ]);
            }
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
     * Updates an existing Booking model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $data = ArrayHelper::map(Lapangan::find()->select(['id', 'nama'])->all(), 'id', 'nama');

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title'=> "Update Booking #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save', ['class'=>'btn btn-primary','type'=>"submit"])
                ];
            } elseif ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Booking #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit', ['update','id'=>$id], ['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            } else {
                return [
                    'title'=> "Update Booking #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'data' => $data,
                    ]),
                    'footer'=> Html::button('Close', ['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save', ['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'data' => $data,
                ]);
            }
        }
    }

    /**
     * Delete an existing Booking model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
    * Delete multiple existing Booking model.
    * For ajax request will return json object
    * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
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
