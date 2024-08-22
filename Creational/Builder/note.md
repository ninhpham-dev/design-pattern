# Builder Pattern
Là pattern thuộc kiểu Creational Pattern, cho phép xây dựng 1 đối tượng phức tạp theo từng bước đơn giản

1. Đặt vấn đề\
Giả sử có yêu cầu như sau:\
Ta có 1 class về ngôi nhà,  1 ngôi nhà cơ bản bao gồm tường, của chính, cửa sổ, mái nhà. \
Giờ có yêu cầu cần mở rộng ngôi nhà với nhiều biến thể hơn như sau: có cổng, sân vườn, hồ bơi, có số phòng .... \
Nhà A gồm 4 bức tường, 1 của chính, 2 của sổ, 1 mái nhà, có cổng, có sân vườn, có hồ bơi, 4 phòng => House(4, 1, 2, 1. true, true, true, 4 ....)\
Nhà B gồm 4 búc tưởng, 1 cửa chính, 3 của sổ, 1 mái nhà, ko có cổng, ko có sân vườn, ko có hồ bơi, 3 phòng => House(4, 1, 2, 1. null, null, null, 3 ....)\
Cách đơn giản nhất là nhét hết tham số kia vào hàm construct.\
=> Các ngôi nhà hầu như sẽ gần như không có hồ bơi nên tham số của hồ bơi gần như không được sử dụng, hơn nữa nhét tất cả các tham số vào \construct rất xấu, có rất khó đọc và kiểm soát

2. Cách giải quyết\
Builder Pattern sẽ chia nhỏ việc tạo đối tượng thành nhiều hàm riêng biệt, và ta cũng không cần thiết phải gọi đến tất cả các hàm mà chỉ cần gọi 1 số hàm cần thiết\
Với ví dụ trên thì ta tạo ra nhiều hàm: buildWalls, buildDoor, buildWindows ... Và ta cần chỉ cần gọi các hàm này khi cần tạo 1 đối tượng ngôi nhà, và chỉ cần gọi các hàm cần thiết\
=> Nhà A: buildWalls(4), buildDoor, buildWindows(2), buildRoof, buildGate, buildSwimpool, buildGarden, buildRooms(4)\
=> Nhà B: buildWalls(4), buildDoor, buildWindows(3), buildRoof, buildRooms(4)

3. Mục đích 
- Giúp tạo ra đối phức tạp một cách dễ dàng hơn, dễ quản lý và mở rộng hơn. Việc tạo đối tượng sẽ chia thành các bước nhỏ để dễ dàng kiểm soát
- Giảm sự phụ thuộc vào hàm constructor. Vì đã chia thành nhiều bước nhỏ nên sẽ dể hiểu hơn
- Có tính linh hoạt cao, dễ dàng mở rộng

4. Nên sử dụng khi nào?
- Cần tạo 1 đối tượng phức tạp và có nhiều tham số và cần tham số có thể tùy chỉnh
- Việc tạo đối tượng cần nhiều bước phức tạp
- Muốn kiểm soát việc tạo đối tượng 1 cách dễ dàng
- Việc tạo đối tượng có quá nhiều tham số trong constructor và muốn giảm phụ thuộc vào nó

5. Cấu trúc
- Builder: thường là abtract class hoặc interface để định nghĩa các phương thức của class
- ConcreteBuilder: Là các lớp triển khai của builder. Mỗi class này sẽ biểu diễn cụ thể đối tượng
- Director: là phần sử dụng builder để tạo ra 1 đối tượng cụ thể.
- Product: là đối tượng phức tạp cuối cùng được xây dựng

6. Nhược điểm
- Cấu trúc có thể trở nên phức tạp hơn khi có nhiều lớp Builder.
- Có thể dẫn đến việc tạo ra quá nhiều lớp, đặc biệt là khi chỉ cần một đối tượng đơn giản.

Tham khảo: https://refactoring.guru/design-patterns/builder

