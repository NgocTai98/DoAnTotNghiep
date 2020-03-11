<?php

function showErrors($errors, $name){
    if ($errors->has($name)) {
        echo '<div class="alert bg-danger" role="alert">';
        echo '<svg class="glyph stroked cancel">';
        echo '<use xlink:href="#stroked-cancel"></use>';
        echo '</svg>'.$errors->first($name).'<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>';
        echo '</div>';
    }
}

function showCategory($arr,$parent,$tab){
    foreach ($arr as $value) {
        if ($value['parent'] == $parent) {
            echo '<div class="item-menu"><span>'.$tab.$value['name'].'</span>';
			echo '<div class="category-fix">';
			echo '<a class="btn-category btn-primary" href="/admin/category/edit/'.$value['id'].'"><i class="fa fa-edit"></i></a>';
			echo '<a onclick="return DelCate('."'".$value->name."'".');"  class="btn-category btn-danger" href="/admin/category/del/'.$value['id'].'"><i class="fas fa-times"></i></i></a>';

			echo '</div>';
            echo '</div>';
            showCategory($arr,$value['id'],$tab.'--|');
        }
    }
}

function getCategory($cate,$parent,$tab,$idselect){
    foreach($cate as $value){
        if ($value['parent']==$parent) {
            if ($value['id']==$idselect) {
                echo '<option selected value="'.$value['id'].'">'.$tab.$value['name'].'</option>'; 
            }
            else{
                echo '<option value="'.$value['id'].'">'.$tab.$value['name'].'</option>';
            }
            
            getCategory($cate,$value['id'],$tab.'--|',$idselect);
        }
    }
}

function attr_values($mang)
{
    $result=array();
    foreach($mang as $value)
    {
        $attr=$value->attribute->name;
        $result[$attr][]=$value->value;
    }
    return $result;
}

function get_combinations($arrays) {
	$result = array(array());
	foreach ($arrays as $property => $property_values) {
		$tmp = array();
		foreach ($result as $result_item) {
			foreach ($property_values as $property_value) {
				$tmp[] = array_merge($result_item, array($property => $property_value));
			}
		}
		$result = $tmp;
	}
	return $result;
}

function check_value($product, $value_check) {
    foreach ($product->values as $value) {
        if ($value->id == $value_check) {
            return true;
        }
    }
    return false;
}