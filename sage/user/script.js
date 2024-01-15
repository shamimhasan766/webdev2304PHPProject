$(document).ready(function() {
    $('.table').on('click', '.edit-row', function() {
        var row = $(this).closest('tr');

        row.find('.editable').each(function() {
            var content = $(this).text();
            if ($(this).hasClass('select-column')) {
                var selectOptions = [
                    { value: 'Super Admin', text: 'Super Admin' },
                    { value: 'Moderator', text: 'Moderator' },
                    { value: 'Viewer', text: 'Viewer' }
                ]; // Your select options with values
                
                var selectField = $('<select class="edit-input form-select"></select>');
        
                selectOptions.forEach(function(option) {
                    var optionElement = $('<option></option>').text(option.text).attr('value', option.value);
                    if (option.value === content) { // Set selected option based on content
                        optionElement.attr('selected', 'selected');
                    }
                    selectField.append(optionElement);
                });
        
                $(this).html(selectField);
            }else if ($(this).hasClass('gender')) {
                var selectOptions = [
                    { value: 'male', text: 'Male' },
                    { value: 'female', text: 'Female' }
                ]; // Your select options with values
                
                var selectField = $('<select class="edit-input form-select"></select>');
        
                selectOptions.forEach(function(option) {
                    var optionElement = $('<option></option>').text(option.text).attr('value', option.value);
                    if (option.value === content) { // Set selected option based on content
                        optionElement.attr('selected', 'selected');
                    }
                    selectField.append(optionElement);
                });
        
                $(this).html(selectField);
            } 
            else {
                var inputField = $('<input type="text" class="edit-input form-control" value="' + content + '">');
                $(this).html(inputField);
            }
        });
        
        

        var id = $(this).val();
        var saveButton = $('<button style="margin-right:10px;" class="save-row btn btn-success">Save</button>');
        saveButton.data('id', id);
        $(this).replaceWith(saveButton);
    });

    $('.table').on('click', '.save-row', function() {
        var row = $(this).closest('tr');
        var editedValues = [];

        row.find('.edit-input').each(function() {
            editedValues.push($(this).val());
        });

        var id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: 'edit_user.php', // PHP script to handle database update
            data: {
                id: id,
                values: editedValues
            },
            success: function(response) {
                // Handle success response if needed
                console.log('Update successful');
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error(error);
            }
        });

        // Revert input fields to text cells
        row.find('.edit-input').each(function(index) {
            $(this).closest('td').text(editedValues[index]);
        });

        var editButton = $('<button value="' + id + '" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>');
        $(this).replaceWith(editButton);
    });
});


$('.delete').on('click', function(){
    let id = $(this).data('id');
    let name = $(this).data('name');
    Swal.fire({
		title: "Are you sure?",
		text: "You Want TO Delete The User '"+name+"'",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, I will Delete!"
		}).then((result) => {
		if (result.isConfirmed) {
			
			window.location.href = 'delete_user.php?id='+id+'&name='+name;
			
		}
	});
})
