<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organization;

/**
 * OrganizationSearch represents the model behind the search form of `app\models\Organization`.
 */
class OrganizationSearch extends Organization
{
    public $contactPersonName;
    public $contactPersonSurname;
    public $contactPersonEmail;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'address', 'inn', 'kpp', 'phone', 'contactPersonName', 'contactPersonSurname', 'contactPersonEmail'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Organization::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
                'address',
                'inn',
                'kpp',
                'phone',
                'contactPersonName' => [
                    'asc' => ['persons.name' => SORT_ASC],
                    'desc' => ['persons.name' => SORT_DESC],
                ],
                'contactPersonSurname' => [
                    'asc' => ['persons.surname' => SORT_ASC],
                    'desc' => ['persons.surname' => SORT_DESC],
                ],
                'contactPersonEmail' => [
                    'asc' => ['persons.email' => SORT_ASC],
                    'desc' => ['persons.email' => SORT_DESC],
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'kpp', $this->kpp])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        $query->joinWith(['contactPerson' => function ($q) {
            $q->andFilterWhere(['like', 'persons.name', $this->contactPersonName]);
            $q->andFilterWhere(['like', 'persons.surname', $this->contactPersonSurname]);
            $q->andFilterWhere(['like', 'persons.email', $this->contactPersonEmail]);
        }]);

        return $dataProvider;
    }
}
