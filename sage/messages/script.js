$('.delete').on('click', function(){
    let id = $(this).data('id');
    let name = $(this).data('name');
    Swal.fire({
		title: "Are you sure?",
		text: "You Want To Delete Message From ' "+name+" '",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, I will Delete!"
		}).then((result) => {
		if (result.isConfirmed) {
			
			window.location.href = 'message_delete.php?id='+id+'&name='+name;
			
		}
	});
})