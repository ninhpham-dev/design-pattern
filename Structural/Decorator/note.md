# Decorator Pattern
Là pattern thuộc kiểu Structural Pattern, cho phép thêm các chức năng mới cho một đối tượng một cách linh hoạt mà không cần phải thay đổi cấu trúc của đối tượng đó

1. Đặt vấn đề\
Giả sử có yêu cầu như sau:\
Bạn đang có 1 quán cafe và bán nhiều loại đồ uống (coffe, milktea). tương ứng với class Coffe, MilkTea đều implements từ interface Beverage. Giờ có yêu cầu cần thêm các topping cho các loại đồ uống này như đường, đá, sữa, socola ... \
Theo thông thường ta sẽ kế thừa từ các Class Coffe, MilkTea để tạo ra nhiều biến thể để đáp ứng yêu cầu: CoffeWithSugar, CoffeWithMilk, CoffeWithChocolate, CoffeeWithSugarAndMilk, CoffeeWithSugarAndMilkAndChocolate ... Vấn đề ở đây là ta phải tạo ra quá nhiều biến thể và sẽ rất khó khăn khi phải mở rộng 
2. Cách giải quyết
- Decorator Pattern cho phép giải quyết vấn đề này một cách linh hoạt hơn như sau. Nó cho phép bạn **wrap** một đối tượng gốc bằng cách sửdụng một lớp decorator. Thay vì sửa đổi trực tiếp đối tượng, bạn tạo ra một hoặc nhiều class decorator để thêm các tính năng mới. Mỗi lớpdecorator sẽ mở rộng hoặc thay đổi hành vi của đối tượng gốc một cách linh hoạt.
- Tạo ra các : MilkDecorator, SugarDecorator, ChocolateDecorator và sử dụng như sau:
    - Coffe basic: A = new Coffe();
    - Coffe với sữa: B = new MilkDecorator(A);
    - Coffe với đường và sữa: C = new SugarDecorator(B);
    - Coffe với đường và sữa và socola: D = new SugarDecorator(C);
3. Mục đích
    - Thêm tính năng mới cho đối tượng mà không thay đổi mã nguồn của class gốc.
    - Tăng tính linh hoạt: có thể thêm, sửa đổi hoặc mở rộng các chức năng mà không phải tại ra quá nhiều class con
    - Kết hợp các tính năng một cách linh hoạt: có thể kết hợp nhiều lớp decorator với nhau, cho phép các tính năng được thêm vào đối tượng một cách linh hoạt.
    - Giữ nguyên tính tương thích: đối tượng gốc không bị ảnh hưởng, giúp bạn giữ nguyên khả năng hoạt động của nó trong các phần khác của hệ thống.

4. Nên sử dụng khi nào?
    - Khi cần mở rộng chức năng của một đối tượng mà không muốn thay đổi mã class gốc
    - Khi cần bổ sung các tính năng linh hoạt hoặc cần kết hợp chúng
    - Khi phải tạo ra quá nhiều class kế thừa
    - Khi cần thay đổi đối tượng theo yêu cầu mà không làm ảnh hưởng đến các đối tượng khác
5. Cấu trúc
    - Component: thường là abtract class hoặc interface để định nghĩa các phương thức của class
    - Concrete Component: là class thực hiện các chức năng cơ bản theo interface của Component. Nó chứa các function chính
    - Decorator: Đây là lớp trừu tượng hoặc class base cho tất cả các lớp Decorator con. Nó có một thuộc tính (thường là private hoặc protected) để giữ đối tượng Component mà nó đang trang trí.
    - Concrete Decorators: Đây là các class cụ thể kế thừa từ lớp Decorator. Chúng bổ sung các chức năng hoặc thuộc tính mới cho đối tượng cơ bản và thực hiện các phương thức của Component.

Note: Nên tham khảo code để hiểu hơn