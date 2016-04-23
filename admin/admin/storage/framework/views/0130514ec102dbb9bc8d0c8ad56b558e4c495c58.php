<?php $__env->startSection('title', 'Admin | Dashboard'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="page-title">
    <span class="title">Asset list</span>

    <div class="description">dfg</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">

    <div class="card-title">
        <div class="title">Assets</div>
    </div>
</div>
<div class="card-body">
<table class="datatable table table-striped" cellspacing="0" width="100%">
<thead>
<tr>
    <th>Title</th>
    <th>Start date</th>
    <th>End date</th>
</tr>
</thead>
<tfoot>
<tr>
    <th>Name</th>
    <th>Position</th>
    <th>Office</th>
    <th>Age</th>
    <th>Start date</th>
    <th>Salary</th>
</tr>
</tfoot>
<tbody>
<tr>
    <td>Ходячие мертвецы</td>
    <td>01.01.2016</td>
    <td></td>
</tr>
</tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>