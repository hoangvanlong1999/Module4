<form action="{{route('users.store')}}" method="POST">
    @csrf
    Tên: 
    <input type="text" name="name" id=""><br>
    Email: 
    <input type="text" name="email" id=""><br>
    Tuổi: 
    <input type="text" name="age" id=""><br>
    Thành Phố: 
    <input type="text" name="city" id=""> <br>
    <input type="submit" value="Thêm">
</form>