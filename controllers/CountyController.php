<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CountyController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Player models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlayerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$data = $searchModel->getAll();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'data' => $data,
			'model' => $searchModel,
        ]);
    }

    /**
     * Displays a single Player model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionLists($id)
    {
       if (Yii::$app->request->isAjax) {
           $countPosts = \app\models\County::find()
           ->where(['country_id' => $id])
           ->count();

           $posts = \app\models\County::find()
           ->where(['country_id' => $id])
           ->orderBy('id DESC')
           ->all();

           if($countPosts>0){
           foreach($posts as $post){

           echo "<option value='".$post->id."'>".$post->name."</option>";
           }
           }
           else{
           echo "<option>-</option>";
           }
        }

    }
    
}
