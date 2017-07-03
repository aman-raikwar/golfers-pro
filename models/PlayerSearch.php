<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Player;

/**
 * PlayerSearch represents the model behind the search form about `app\models\Player`.
 */
class PlayerSearch extends Player
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'FirstClubID', 'isRegistered', 'Country', 'optIn'], 'integer'],
            [['FirstName', 'LastName', 'DateOfBirth', 'Email', 'Address', 'RegisterationKey', 'password_hash', 'PhoneNo', 'Title', 'IsMemberOfAnotherClub', 'OtherClubName', 'Gender', 'Address2', 'Town', 'County', 'CountyCardId', 'CountyCardNumber', 'PostCode', 'Notes', 'player_lifetime_id', 'activation_key', 'on_date', 'OpgRegType'], 'safe'],
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
        $query = Player::find();

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
            'FirstClubID' => $this->FirstClubID,
            'DateOfBirth' => $this->DateOfBirth,
            'isRegistered' => $this->isRegistered,
            'Country' => $this->Country,
            'optIn' => $this->optIn,
            'on_date' => $this->on_date,
        ]);

        $query->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'RegisterationKey', $this->RegisterationKey])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'PhoneNo', $this->PhoneNo])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'IsMemberOfAnotherClub', $this->IsMemberOfAnotherClub])
            ->andFilterWhere(['like', 'OtherClubName', $this->OtherClubName])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'Address2', $this->Address2])
            ->andFilterWhere(['like', 'Town', $this->Town])
            ->andFilterWhere(['like', 'County', $this->County])
            ->andFilterWhere(['like', 'CountyCardId', $this->CountyCardId])
            ->andFilterWhere(['like', 'CountyCardNumber', $this->CountyCardNumber])
            ->andFilterWhere(['like', 'PostCode', $this->PostCode])
            ->andFilterWhere(['like', 'Notes', $this->Notes])
            ->andFilterWhere(['like', 'player_lifetime_id', $this->player_lifetime_id])
            ->andFilterWhere(['like', 'activation_key', $this->activation_key])
            ->andFilterWhere(['like', 'OpgRegType', $this->OpgRegType]);

        return $dataProvider;
    }
}
