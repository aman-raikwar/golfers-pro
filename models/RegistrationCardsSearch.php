<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RegistrationCards;

/**
 * RegistrationCardsSearch represents the model behind the search form about `app\models\RegistrationCards`.
 */
class RegistrationCardsSearch extends RegistrationCards {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ID'], 'integer'],
            [['CardNumber', 'UserID', 'RegisteredDate', 'ClubID'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = RegistrationCards::find()->orderBy(['ID' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'RegisteredDate' => $this->RegisteredDate,
        ]);

        $query->andFilterWhere(['like', 'CardNumber', $this->CardNumber])
                ->andFilterWhere(['like', 'UserID', $this->UserID])
                ->andFilterWhere(['like', 'ClubID', $this->ClubID]);

        if (Yii::$app->user->identity->user_roleID == 3) {
            $user_id = Yii::$app->user->identity->user_id;
            $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
            if (!empty($club)) {
                $query->andFilterWhere(['=', 'ClubID', $club->golfclub_id]);
            } else {
                $query->andFilterWhere(['=', 'ClubID', 0]);
            }
        }

        return $dataProvider;
    }

}
