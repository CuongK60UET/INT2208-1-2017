Feature: Trang chủ
    Hiển thị các bộ quần áo mới cập nhật hoặc các bộ bán chạy nhất
	Tôi có thể tìm kiếm vào đặt hàng
    Scenario: Hiển thị danh sách
        Given Khi ở giao diện trang chủ
        Then Tôi có thể xem và thêm vào giỏ hàng của bạn
    Scenario: tìm kiếm
		Given Mục tiềm kiếm
		Then Tìm kiếm các sản phẩm bạn cần
	Scenario: Đăng nhập
		Given Nút đăng nhập
		Then Tôi đăng nhập vào tài khoản của tôi
	Scenario: Đăng kí
		Given Nút đăng kí
		Then Đăng kí tài khoản nếu tôi chưa có
	Scenario: Kiểm tra giỏ hàng
		Given Nút kiểm tra giỏ hàng
		Then ĐI tới giỏ hàng của tôi
Feature: Kiểm tra giỏ hàng
	Ở giao diện giổ hàng 
	Tôi kiểm tra được các sản phẩm tôi đã mua và thanh toán nó
    Scenario: Kiểm tra giỏ hàng
        Given Hiển thị toàn bộ các sản phẩm bạn mua
        Then Tôi có thể thanh toán hoặc huỷ các sản phẩm đã mua
	Scenario: Thanh toán
		Given Tôi muốn thanh toán
		Then Thanh toán hoá đơn bằng cách nhấn vào nút thanh toán
	Scenario: Huỷ sản phẩm
		Given tôi muốn huỷ 1 số sản phẩm
		Then Nhấn vào nút huỷ sản phẩm ngay bên dưới để huỷ
	Scenario: Đăng xuất 
		Given tôi muốn đang xuất
		Then nhấn vào nút đăng xuất 

Feature: Đăng nhập
    Nhập tài khoản và mật khẩu để đăng nhập
	Chưa có tài khoản thì có thể đăng kí mới
    Scenario: Đăng nhập
        Given tôi có tài khoản và mật khẩu
		Then Đăng nhập 
        
    Scenario: Tạo mới tài khoản
        Given tôi không có tài khoản 
        Then tạo tài khoản mới


Feature: Tạo tài khoản mới
    Tôi không có tài khoản và muốn tạo mới 1 tài khoản
    Scenario: Tạo tài khoản
        Given Tôi muốn tạo 1 tài khoản
        Then Điền thông tin cá nhân và bắt đầu tạo tài khoản

