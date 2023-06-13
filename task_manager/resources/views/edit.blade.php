<form action="{{route('customers.update')}}" method="post">
    @csrf
    @method('PUT')
    STT:<input type="text" name="" id=""><br>
    Tên:<input type="text" name="" id=""><br>
    SĐT:<input type="text" name="" id=""><br>
    Email:<input type="text" name="" id=""><br>
    <input type="submit" value="Cập Nhật">
</form>