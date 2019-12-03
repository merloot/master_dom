<?php
namespace frontend\modules\doors\models\api;

use yii\base\Model;
use common\helpers\JResponse;
use frontend\modules\doors\models\FinishedDoors;

class StorageList extends Model {

    public $page;
    public $limit;
    public $search;
    public $text_filter;

    public function rules() {
        return [
            [['text_filter'], 'string'],
//            ['limit'],'integer',
            [['page'],'integer', 'min' => 1],
            [['page'], 'default', 'value' => 2],
            [['limit'], 'default', 'value' => 10],
        ];
    }

    public function run() {
        $query = FinishedDoors::find();
        $offset = ($this->page - 1) * $this->limit;

        $query->offset($offset)->limit($this->limit);
        $count = $query->count();
        $maxPage = ceil($count / $this->limit);
        if (!empty($this->text_filter)) {
            $query->orFilterWhere([
                'ilike', 'name', $this->text_filter
            ]);
        }
        $storage = $query->select(['id', 'name','type_doors','price'])->with(['sizes','images'])->asArray()->all();

        return [
            'storage'   => $storage,
            'max_page'  => $maxPage,
            'count'     => $count
        ];
    }
}