@extends('layouts.master')

@section('title','My Order')

@section('css')

<style type="text/css">

.todo-list li{
	list-style: none;
}

.todo-list-section .task-text{
	border: none;
	margin: 10px 0px;
	width: 80%;
	border-bottom: 2px solid #87c0cd;
}

.todo-list-section .completed .task-text{
	color: #808080;
	text-decoration:line-through;
}

.todo-list-section .custom-checkbox{
	display: inline-block;
}

.todo-list-section .btn-remove{
    background-color: #fff;
    color: #dc3545;
    font-size: 14px;
    height: 25px;
    width: 25px;
    padding: 5px 0px;
    border-radius: 5px;
    border: 1px solid #dc3545;
}

.todo-list-section .btn-remove:hover{
	background-color: #dc3545;
	color: #fff;
	cursor: pointer;
}

.todo-list-section .btn-add{
    background-color: #fff;
    color: #007bff;
    font-size: 14px;
    height: 25px;
    width: 25px;
    padding: 5px 0px;
    border-radius: 5px;
    border: 1px solid #007bff;
}

.todo-list-section .btn-add:hover{
	background-color: #007bff;
	color: #fff;
	cursor: pointer;
}

.btn-save{
    background-color: #fff;
    color: #28a745;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #28a745;
}

.btn-save:hover{
	background-color: #28a745;
	color: #fff;
	cursor: pointer;
}

.todo-list-section .btn-todo{
	padding-left: 40px;
}

.btn-addList{
    background-color: #fff;
    color: #007bff;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #007bff;
}

.btn-addList:hover{
	background-color: #007bff;
	color: #fff;
	cursor: pointer;
}

.btn-back{
    background-color: #fff;
    color: #6c757d;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #6c757d;
}

.btn-back:hover{
	background-color: #6c757d;
	color: #fff;
	cursor: pointer;
}

.toDoListheader{
	border: none;
	background-color: transparent;
	font-size: 24px;
	width: 100%;
}

.todo-list-section .btn-removeList{
    background-color: #fff;
    color: #dc3545;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #dc3545;
}

.todo-list-section .btn-removeList:hover{
	background-color: #dc3545;
	color: #fff;
	cursor: pointer;
}

.card-header {
    background-color: #fff;
    border: none;
	border-left: 0.5px solid rgba(0,0,0,.125);
}


</style>

@endsection

@section('content')
<div class="container">
	<div class="col-12 text-right my-4">
		<div class="btn-back btn" onclick="goBack()">Back <i class="fas fa-arrow-left"></i></div>
		<div class="btn-addList btn" data-bind="click: addList" title="Add a new list">Add List <i class="fas fa-plus"></i></div>
		<div class="btn-save btn" data-bind="click: saveTodoItem" title="Save to do list">Save Changes<i class="fas fa-check" ></i></div>
	</div>
	<form id="itinerary">
		@csrf
		<div class="row" data-bind="foreach: toDoList">
			<section class="todo-list-section col-6 p-0 card">
				<div class="todo-list-inner-sec-wrap">
					<header class="card-header">
						<div class="text-right">
							<div class="btn-removeList btn" data-bind="click: $parent.removeList" title="Save to do list">Delete</div>
						</div>
						<h1><input class="toDoListheader" type="text" data-bind="value: name, attr: { 'placeholder': 'Things to Do' }"> </h1>
					</header>
					<div class="todo-list-wrapper">
						<ul class="todo-list" data-bind="foreach: item">
							<li data-bind="css: {completed: isCompleted}">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input task-checkbox" data-bind="checked: isCompleted, attr :{ id: 'customCheck' + $index() }" title="Mark task completed">
									<label class="custom-control-label" data-bind="attr :{ for: 'customCheck' + $index() }"></label>
								</div>
								<input class="task-text" data-bind="value: task, attr: { 'placeholder': 'Enter a new task' }" placeholder="Enter a new task">
								<i class="fas fa-times btn btn-remove" data-bind="click: $parent.removeTodoItem" title="Remove Item"></i>
							</li>
						</ul>
						<div class="btn-todo my-4">
							<i class="fas fa-plus btn-add btn" data-bind="click: addTodoItem" title="Add a new task"></i>
						</div>
					</div>
				</div>
			</section>
		</div>
	</form>
</div>


@endsection

@section('scripts')
<script type="text/javascript">

	function goBack() {
		window.history.back();
	}

	var itinerary_data = {!! json_encode($itinerary) !!};


	function ToDoList(name, item){
		this.name = name;
		this.item = item;

		this.addTodoItem = function(toDoList){
			this.item.push(new ToDoItem("", false));
		}

		this.removeTodoItem = function(todoItem){
			item.remove(todoItem);
		}
	}


	function ToDoItem(task, isCompleted) {
		this.task = ko.observable(task);
		this.isCompleted = ko.observable(isCompleted);
	}

	function ListViewModel(){
		var self = this;

		self.toDoList = ko.observableArray();

		self.saveTodoItem = function(todoItem){

			var toDoList = [];


			$(self.toDoList()).each(function(index){
				var toDoItem = [];
				$(this.item()).each(function(index){
					toDoItem.push([this.task(),this.isCompleted()]);
				});
				toDoList.push([this.name, toDoItem]);
			});

			var order_id = {!! $order !!};

			$.ajax({
				type: "POST",
				url: '/itinerary/' + order_id,
				data: {
					'_token': $('input[name=_token]').val(),
					'todolist': toDoList,
				},
				success: function(data){
					alert('Changes saved');
				}
			});
		}

		self.addList = function(){

			var toDoItems = ko.observableArray([
				new ToDoItem("Item 1", false)
				]);
			self.toDoList.push(new ToDoList("Things to do", toDoItems));
		}

		self.removeList = function(removeList){
			self.toDoList.remove(removeList);
		}

		if(itinerary_data.length != 0){
			$(itinerary_data[0].Description).each(function(index){
				var toDoItems = ko.observableArray();
				$(this[1]).each(function(index){
					if(this[1] == 'false'){
						this[1] = false;
					}
					else{
						this[1] = true;
					}
					toDoItems.push(new ToDoItem(this[0],this[1]));
				});


				self.toDoList.push(new ToDoList(this[0], toDoItems));
			});
		}


	}

	ko.applyBindings(new ListViewModel());


</script>
@endsection
