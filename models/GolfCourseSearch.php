<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GolfCourse;

/**
 * GolfCourseSearch represents the model behind the search form about `app\models\GolfCourse`.
 */
class GolfCourseSearch extends GolfCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'IsAdmin', 'ClubHoles', 'ClubYardage', 'ClubPar', 'GreenFeeFrom', 'GreenFeeTo', 'hasDrivingRange', 'hasPracticeGround', 'hasPracticeNet', 'hasPuttingGreen', 'hasSwingStudio', 'hasBuggyHire', 'hasTrolleyHire', 'allowsSociety', 'hasVenueHire', 'hasShowers', 'hasSnooker', 'hasGym', 'hasSwimming', 'hasAccommodation'], 'integer'],
            [['Name', 'LoginID', 'Password', 'Activationkey', 'Email', 'ClubFacebook', 'ClubTwitter', 'ContactNumber', 'Address1', 'Address2', 'Town', 'County', 'Country', 'PostCode', 'AddressNote', 'ClubDescription', 'ClubUrl', 'GpgUrl', 'ClubLogo', 'MainImage'], 'safe'],
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
        $query = GolfCourse::find();

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
            'IsAdmin' => $this->IsAdmin,
            'ClubHoles' => $this->ClubHoles,
            'ClubYardage' => $this->ClubYardage,
            'ClubPar' => $this->ClubPar,
            'GreenFeeFrom' => $this->GreenFeeFrom,
            'GreenFeeTo' => $this->GreenFeeTo,
            'hasDrivingRange' => $this->hasDrivingRange,
            'hasPracticeGround' => $this->hasPracticeGround,
            'hasPracticeNet' => $this->hasPracticeNet,
            'hasPuttingGreen' => $this->hasPuttingGreen,
            'hasSwingStudio' => $this->hasSwingStudio,
            'hasBuggyHire' => $this->hasBuggyHire,
            'hasTrolleyHire' => $this->hasTrolleyHire,
            'allowsSociety' => $this->allowsSociety,
            'hasVenueHire' => $this->hasVenueHire,
            'hasShowers' => $this->hasShowers,
            'hasSnooker' => $this->hasSnooker,
            'hasGym' => $this->hasGym,
            'hasSwimming' => $this->hasSwimming,
            'hasAccommodation' => $this->hasAccommodation,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'LoginID', $this->LoginID])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Activationkey', $this->Activationkey])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'ClubFacebook', $this->ClubFacebook])
            ->andFilterWhere(['like', 'ClubTwitter', $this->ClubTwitter])
            ->andFilterWhere(['like', 'ContactNumber', $this->ContactNumber])
            ->andFilterWhere(['like', 'Address1', $this->Address1])
            ->andFilterWhere(['like', 'Address2', $this->Address2])
            ->andFilterWhere(['like', 'Town', $this->Town])
            ->andFilterWhere(['like', 'County', $this->County])
            ->andFilterWhere(['like', 'Country', $this->Country])
            ->andFilterWhere(['like', 'PostCode', $this->PostCode])
            ->andFilterWhere(['like', 'AddressNote', $this->AddressNote])
            ->andFilterWhere(['like', 'ClubDescription', $this->ClubDescription])
            ->andFilterWhere(['like', 'ClubUrl', $this->ClubUrl])
            ->andFilterWhere(['like', 'GpgUrl', $this->GpgUrl])
            ->andFilterWhere(['like', 'ClubLogo', $this->ClubLogo])
            ->andFilterWhere(['like', 'MainImage', $this->MainImage]);

        return $dataProvider;
    }
}
