<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Golfer;

/**
 * GolferSearch represents the model behind the search form about `app\models\Golfer`.
 */
class GolferSearch extends Golfer {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['golfer_id', 'golfer_firstClubID', 'golfer_country', 'golfer_optIn'], 'integer'],
            [['golfer_title', 'golfer_firstname', 'golfer_lastname', 'golfer_gender', 'golfer_dateOfBirth', 'golfer_address1', 'golfer_address2', 'golfer_phone', 'golfer_town', 'golfer_isMemberOfAnotherClub', 'golfer_otherClubID', 'golfer_county', 'golfer_countyCardId', 'golfer_countyCardNumber', 'golfer_postCode', 'golfer_notes', 'golfer_lifetimeID', 'golfer_opgRegType'], 'safe'],
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
        $query = Golfer::find();

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
            'golfer_id' => $this->golfer_id,
            'golfer_dateOfBirth' => $this->golfer_dateOfBirth,
            'golfer_firstClubID' => $this->golfer_firstClubID,
            'golfer_country' => $this->golfer_country,
            'golfer_optIn' => $this->golfer_optIn,
        ]);

        $query->andFilterWhere(['like', 'golfer_title', $this->golfer_title])
                ->andFilterWhere(['like', 'golfer_firstname', $this->golfer_firstname])
                ->andFilterWhere(['like', 'golfer_lastname', $this->golfer_lastname])
                ->andFilterWhere(['like', 'golfer_gender', $this->golfer_gender])
                ->andFilterWhere(['like', 'golfer_address1', $this->golfer_address1])
                ->andFilterWhere(['like', 'golfer_address2', $this->golfer_address2])
                ->andFilterWhere(['like', 'golfer_phone', $this->golfer_phone])
                ->andFilterWhere(['like', 'golfer_town', $this->golfer_town])
                ->andFilterWhere(['like', 'golfer_isMemberOfAnotherClub', $this->golfer_isMemberOfAnotherClub])
                ->andFilterWhere(['like', 'golfer_otherClubID', $this->golfer_otherClubID])
                ->andFilterWhere(['like', 'golfer_county', $this->golfer_county])
                ->andFilterWhere(['like', 'golfer_countyCardId', $this->golfer_countyCardId])
                ->andFilterWhere(['like', 'golfer_countyCardNumber', $this->golfer_countyCardNumber])
                ->andFilterWhere(['like', 'golfer_postCode', $this->golfer_postCode])
                ->andFilterWhere(['like', 'golfer_notes', $this->golfer_notes])
                ->andFilterWhere(['like', 'golfer_lifetimeID', $this->golfer_lifetimeID])
                ->andFilterWhere(['like', 'golfer_opgRegType', $this->golfer_opgRegType]);

        if (Yii::$app->user->identity->user_roleID == 3) {
            $user_id = Yii::$app->user->identity->user_id;
            $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
            if (!empty($club)) {
                $query->andFilterWhere(['=', 'golfer_firstClubID', $club->golfclub_id]);
            } else {
                $query->andFilterWhere(['=', 'golfer_firstClubID', 0]);
            }
        }

        return $dataProvider;
    }

}
