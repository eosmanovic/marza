<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;
/**
 * CoworkerFrontendSearch represents the model behind the search form about `common\models\User`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'price', 'pdv', 'quantity', 'mp_price'], 'safe'],
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

        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product.name' => $this->name,
            'product.price' => $this->price,
            'product.pdv' => $this->pdv,
            'product.quantity' => $this->quantity,
            'product.mp_price' => $this->mp_price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', 'price', $this->price])
        ->andFilterWhere(['like', 'pdv', $this->pdv])
        ->andFilterWhere(['like', 'pdv', $this->quantity])
        ->andFilterWhere(['like', 'quantity', $this->mp_price]);
        return $dataProvider;
    }
}