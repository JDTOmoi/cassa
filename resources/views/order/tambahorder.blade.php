@extends('layouts.app')

@section('content')


<div class="container mt-5">
<form action="{{route('tambahord')}}" method="POST">
    @csrf
    <div class="mb-3">
            <label for="image" class="form-label">Order Message</label>
            <input type="text" class="form-control" id="ord_message" name="ord_message" placeholder="Order Message">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Nomor Telpon</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nomor telepon">
          </div>
    <table id="dataTable" class="mx-auto">
        <tr>
            <th class="px-4">Product</th>
            <th class="px-4">Quantity</th>
            <th class="px-4">Notes</th>
            <th class="px-4"></th>
        </tr>
        <tr>
            <td class="px-4"><input type="text" name="column1[]" required></td>
            <td class="px-4"><input type="text" name="column2[]" required></td>
            <td class="px-4"><input type="text" name="column3[]"></td>
            <td><button type="button" onclick="removeRow(this)">Remove</button></td>
        </tr>
    </table>
    <button type="button" onclick="addRow()">Add Row</button>
    <button type="submit">Submit</button>
</form>
</div>

<script>
    function addRow() {
        var table = document.getElementById("dataTable");
        var newRow = table.insertRow(table.rows.length);
        var columns = 3; // Number of columns in the table

        for (var i = 0; i < columns; i++) {
            var cell = newRow.insertCell(i);
            cell.classList.add("px-4");
            var input = document.createElement("input");
            input.type = "text";
            input.name = "column" + (i + 1) + "[]";
            input.required = true;
            cell.appendChild(input);
        }

        var actionCell = newRow.insertCell(columns);
        var removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.textContent = "Remove";
        removeButton.onclick = function () {
            removeRow(this);
        };
        actionCell.appendChild(removeButton);
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        var inputs = row.getElementsByTagName("input");

        // Clear input values
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
        }

        // Remove the row
        row.parentNode.removeChild(row);
    }
</script>

@endsection