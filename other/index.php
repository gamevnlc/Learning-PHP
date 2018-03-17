<?php
/**
 * Tính kế thừa: Khi một lơp được định nghĩa bằng việc kế thừa hàm đang tồn tại của một lớp cha, thì nó được gọi là tính kế thừa. Ở đây lớp con sẽ ké thừa tất cả hoặc một số hàm và biến thành viên của lớp cha
 *
 * Lớp cha, base class
 *
 * lớp con, lớp phụ
 *
 * Tính đa hình: Đây là khai niệm hướng đối tượng mà cùng một hàm có thể được sử dụng cho các mục đích khác nhau, Ví dụ tên hàm sẽ vấn giống như vậy nhưng nó nhận tham số khác nhau và có thể thực hiện các tác vụ khác nhau
 *
 *
 * Nạp trồng (Overloading) - Một kiểu đa hình, trong đó một số hoặc tất cả toán tử có trình triển khai khác nhau phụ thuộc vào kiểu các tham số của chúng. Tượng tự các hàm cũng có được nạp trồng với trình triển khai khác nhau
 *
 *
 * Trưu tượng hóa dữ liệu - Bất kỳ biểu diễn dữ liệu nào mà trong đó chi tiết về trình triển khai bị ẩn
 *
 * Tính bao đóng - Liên quan tới một khái niệm mà chúng ta có thể bao đóng tất cả dữ liệu và hàm thành viên với nhau để tạo thành một Object
 *
 * Constructor Liên quan tới một kiểu hàm đặc biệt mà sẽ được gọi tự động bất cứ khi nào có một sự tạo thành đối tượng từ class
 *
 * Destructor - liên quan tới một kiểu hàm đặc biệt mà sẽ được gọi tự động bất kì khi nào một đối tượng bị xóa hoặc ra khỏi phạm vi
 */ 

/**
 * Interface trong PHP
 * Interface được định nghĩa để cung cấp một tên hàm chung cho các trình triển khai. Các Implementor khác nhau có thể triển khai các interface của chúng theo yêu cầu của chúng . Bạn có thể nói interface là bộ khung mà được triển khai bởi lập trình viên
 * 
 */
// Ví dụ
interface Mail {
   public function sendMail();
}

class Report implements Mail {
   // lớp này cần định nghĩa hàm sendMail()
   public function sendMail()
   {
   	# code...
   }
}

/**
 * Abstract class : lớp trừu tượng
 * Một lớp trừu tượng là một lớp mà không thể khởi tạo, chỉ được kết thừa. Bạn khai báo một lớp trừu tượng với từ khóa abstract trong PHP,
 *
 * Khi kế thừa từ một lớp trừu tượng, tất cả phương thức được đánh dấu abstract trong khai báo lớp cha phải được định nghĩa bởi lớp con, ngoài ra những phương thức này phải được định nghĩ cùng tính nhìn thấy
 *
 * Ghi chú rằng các định nghĩ hàm bên trong một lớp trừu tượng cũng phải được đặt trước bởi từ khóa abstract. Trong PHP nó không hợp lệ nếu bạn định nghĩ hàm abstract trong một lớp non-abstract
 *
 * Ví dụ
 */
abstract class MyAbstractClass {
   // abstract function myAbstractFunction() {}
}

/**
 * Từ khóa static
 * khai báo các thành viên lớp hoặc phương thức lớp là static làm cho chúng có thể truy cập mà không cần một lớp khải tạo. Mộ thành viên được khai báo là static không thể truy cấp với một đối tượng đã được được khởi tạo ( mặc dù một phương thức là static có thể)
 *
 * Ví dụ
 */
class Foo
{
  public static $my_static = 'foo';
  
 	 public function staticValue() {
     return self::$my_static;
  }
}

// print Foo::$my_static . "\n";
// $foo = new Foo();

// print $foo->staticValue() . "\n";


/**
 * Final
 * từ khóa final ngăn cản các lớp con từ việc ghi đè một phương thức bằng việc đặt vào trước định nghĩa từ khóa final, nếu chính lớp đó đang được khai báo là final thì nó không thể kế thừa
 */

class BaseClass {
      public function test() {
         echo "BaseClass::test() called<br>";
      }
      
      final public function moreTesting() {
         echo "BaseClass::moreTesting() called<br>";
      }
   }
   
   class ChildClass extends BaseClass {
      public function moreTestings() {
         echo "ChildClass::moreTesting() called<br>";
      }
   }

/**
 * Gọi constructor cha trong PHP
 * Thay vì viết cả một constructor mới cho lớp con, bạn có thể viết nó bằng cách gọi constructor của lớp cha một cách tường minh và sau dó thực hiện bất kỳ việc gì cần thiết để khởi tạo lớp con này. Dưới đây là một ví dụ đơn giản trong PHP.
 * 
 */

class Name
{
   var $_firstName;
   var $_lastName;
   
   function Name($first_name, $last_name)
   {
      $this->_firstName = $first_name;
      $this->_lastName = $last_name;
   }
   
   function toString() {
      return($this->_lastName .", " .$this->_firstName);
   }
}
class NameSub1 extends Name
{
   var $_middleInitial;
   
   function NameSub1($first_name, $middle_initial, $last_name) {
      Name::Name($first_name, $last_name);
      $this->_middleInitial = $middle_initial;
   }
   
   function toString() {
      return(Name::toString() . " " . $this->_middleInitial);
   }
}

/**
 * Trong ví dụ này, chúng ta có lớp cha Name, có một constructor nhận hai tham số, và một lớp con NameSub1, có một constructor nhận 3 tham số. Constructor của NameSub1 thực hiện chức năng bằng việc gọi constructor cha của nó một cách tường minh bởi sử dụng cú pháp :: (truyền hai tham số của nó) và sau đó thiết lập một trường bổ sung. Theo cách tương tự, NameSub1 định nghĩa hàm toString() mà nó ghi đè từ lớp cha.

Ví dụ − Một constructor có thể được định nghĩa với cùng tên như tên của một lớp, như trong ví dụ trên.
 */

