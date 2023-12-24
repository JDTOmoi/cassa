@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="alert alert-danger mx-3">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container mt-5">
<form action="{{route('admin.tambahord')}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value={{Auth::user()->id}}>
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
            <td class="px-4">
                <select name="produk_id[]" id="produk_id" class="form-select" required>
                    @foreach($produks as $produk)
                    @if(old('produk_id[]') == $produk->id)
                    <option value="{{$produk->id}}" selected>{{$produk->name}}</option>
                    @else
                    <option value="{{$produk->id}}">{{$produk->name}}</option>
                    @endif
                    @endforeach
                </select>
            </td>

            <td class="px-4"><input type="number" name="quantity[]" min="1" class="form-control" required></td>
            <td class="px-4"><input type="text" name="notes[]"  class="form-control"></td>
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
        var columns = 3;

        for (var i = 0; i < columns; i++) {
            var cell = newRow.insertCell(i);
            cell.classList.add("px-4");
            
            if (i == 0){
                var input = document.createElement("select");
                input.name = "produk_id[]";
                var produks = @json($produks);
                console.log(produks);
                input.required = true;
                input.classList.add("form-select");
                for (var j = 0; j < produks.length; j++) {
                    var option = document.createElement("option");
                    option.value = produks[i]['id'];
                    option.text = produks[i]['name'];
                    input.add(option);
                }
                
                cell.appendChild(input);
            }
            else if (i == 1){
                var input2 = document.createElement("input");
                input2.type = "number";
                input2.name = "quantity[]";
                input2.classList.add("form-control");
                input2.addEventListener("input", function(){
                    if (parseInt(input2.value < 1)) {
                        input2.value = 1;
                    }
                });
                input2.required = true;
                cell.appendChild(input2);
            }
            else if (i == 2){
                var input3 = document.createElement("input");
                input3.type = "text";
                input3.name = "notes[]";
                input3.classList.add("form-control");
                cell.appendChild(input3);
            }
            
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