<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GolfClub;

/**
 * GolfClubSearch represents the model behind the search form about `app\models\GolfClub`.
 */
class GolfClubSearch extends GolfClub
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['golfclub_id', 'golfclub_countryID', 'golfclub_countyID', 'golfclub_holes', 'golfclub_yardage', 'golfclub_par', 'golfclub_greenFeeFrom', 'golfclub_greenFeeTo', 'golfclub_userID'], 'integer'],
            [['golfclub_name', 'golfclub_facebookUrl', 'golfclub_twitterUrl', 'golfclub_phone', 'golfclub_address1', 'golfclub_address2', 'golfclub_town', 'golfclub_postCode', 'golfclub_addressNotes', 'golfclub_description', 'golfclub_websiteUrl', 'golfclub_gpgUrl', 'golfclub_logo', 'golfclub_facilities'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = GolfClub::find();

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
            'golfclub_id' => $this->golfclub_id,
            'golfclub_countryID' => $this->golfclub_countryID,
            'golfclub_countyID' => $this->golfclub_countyID,
            'golfclub_holes' => $this->golfclub_holes,
            'golfclub_yardage' => $this->golfclub_yardage,
            'golfclub_par' => $this->golfclub_par,
            'golfclub_greenFeeFrom' => $this->golfclub_greenFeeFrom,
            'golfclub_greenFeeTo' => $this->golfclub_greenFeeTo,
            'golfclub_userID' => $this->golfclub_userID,
        ]);

        $query->andFilterWhere(['like', 'golfclub_name', $this->golfclub_name])
            ->andFilterWhere(['like', 'golfclub_facebookUrl', $this->golfclub_facebookUrl])
            ->andFilterWhere(['like', 'golfclub_twitterUrl', $this->golfclub_twitterUrl])
            ->andFilterWhere(['like', 'golfclub_phone', $this->golfclub_phone])
            ->andFilterWhere(['like', 'golfclub_address1', $this->golfclub_address1])
            ->andFilterWhere(['like', 'golfclub_address2', $this->golfclub_address2])
            ->andFilterWhere(['like', 'golfclub_town', $this->golfclub_town])
            ->andFilterWhere(['like', 'golfclub_postCode', $this->golfclub_postCode])
            ->andFilterWhere(['like', 'golfclub_addressNotes', $this->golfclub_addressNotes])
            ->andFilterWhere(['like', 'golfclub_description', $this->golfclub_description])
            ->andFilterWhere(['like', 'golfclub_websiteUrl', $this->golfclub_websiteUrl])
            ->andFilterWhere(['like', 'golfclub_gpgUrl', $this->golfclub_gpgUrl])
            ->andFilterWhere(['like', 'golfclub_logo', $this->golfclub_logo])
            ->andFilterWhere(['like', 'golfclub_facilities', $this->golfclub_facilities]);

        return $dataProvider;
    }
}
