<style>
table.accomo-table {
	counter-reset: rowNumber;
}

table.accomo-table tbody tr {
	counter-increment: rowNumber;
}

table.accomo-table tbody tr td:first-child:before {
	content: counter(rowNumber);
	min-width: 1em;
    margin-right: 0.5em;
}
</style>
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\trips\models\GroupTrip */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Group Trip',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Trips'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-trip-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	<div class="accommodation col-sm-12">
		<div class="panel panel-white">
            <div class="panel-heading border-dark">
				<h4 class="panel-title">Manage Accommodations</h4>
            </div>
            <div class="panel-body">
            	<table class="table accomo-table">
               		<thead>
               			<th>Order</th>
               			<th>Lodge</th>
               			<th>Staying Nights</th>
               			<th>Actions</th>
               		</thead>
               		<tbody>
               		<?php foreach ($model->tripItems as $item): ?>
               			<tr>
               				<td><input type="hidden" value="<?=$item->id?>"></td>
               				<td><?=$item->lodge->name?></td>
               				<td><?=$item->nights?></td>
               				<td>
               					<button type="button" class="btn btn-warning" onclick="editItem(<?=$item->id?>)"><i class="fa fa-pencil"></i> Edit</button>
               					<button type="button" class="btn btn-danger" onclick="deleteItem(<?=$item->id?>)"><i class="fa fa-remove"></i> Remove</button>
               				</td>
               			</tr>
               		<?php endforeach; ?>
               		</tbody>
               		<tfoot>
               			<form id="accommoda-form">
               			<tr>
               				<td>
               					#
               					<input type="hidden" name="GroupTripItem[trip_id]" value="<?=$model->id?>">
               					<input type="hidden" id="accom-id" name="GroupTripItem[id]" value="">
               				</td>
               				<td>
               					<?php $dataLodges = ArrayHelper::map($model->area->lodges, 'id', 'name'); ?>
               					<?php echo yii\helpers\Html::dropDownList('GroupTripItem[lodge_id]', null, $dataLodges, [
               							'class'=>'form-control', 
               							'id'=>'accom-lodge',
               							'name'=>'GroupTripItem[lodge_id]',
               					])?>
               				</td>
               				<td>
               					<input type="number" id="accomo-nights" name="GroupTripItem[nights]" class="form-control">
               				</td>
               				<td>
               					<button type="button" class="btn btn-success" onclick="addAccommoda()"><i class="fa fa-plus"></i> Add</button>
               					<button type="reset" class="btn btn-default"><i class="fa fa-file-o"></i> Clear</button>
               				</td>
               			</tr>
               			</form>
               		</tfoot>
               	</table>
            </div>
        </div>
	</div>
</div>

<script>
function addAccommoda()
{
	$.ajax({
		type: 'post',
		url: "<?=Url::to(['grouptrip/additem'])?>",
		data: $('#accommoda-form').serialize(),
		success: function(data) {
			if(data == 'success')
				$('#accommoda-form').reset();
			else
				console.log(data);
		},
		error: function(data) {
			console.log(data);
		}
	});
}
</script>