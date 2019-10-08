<?php
session_start;
include_once('header.php');
include_once('nav.php');
include_once('model/book.php');


if ($_REQUEST['action'] == 'add') {
    if ($_REQUEST['newId'] && $_REQUEST['newTitle'] && $_REQUEST['newPrice'] && $_REQUEST['newAuthor'] && $_REQUEST['newYear']) {
        Book::addBook($_REQUEST['newId'], $_REQUEST['newTitle'], $_REQUEST['newPrice'], $_REQUEST['newAuthor'], $_REQUEST['newYear']);
    }
}
if ($_REQUEST['action'] == 'delete') {
    Book::deleteBook($_REQUEST['id']);
}
if ($_REQUEST['action'] == 'edit') {
    if ($_REQUEST['editId'] && $_REQUEST['editTitle'] && $_REQUEST['editPrice'] && $_REQUEST['editAuthor'] && $_REQUEST['editYear']) {
        Book::editBook($_REQUEST['editId'], $_REQUEST['editTitle'], $_REQUEST['editPrice'], $_REQUEST['editAuthor'], $_REQUEST['editYear']);
    }
}

$keyWord = null;
// $keyWord = $_REQUEST('search');
$books = Book::getListFromFile($keyWord);

?>
<div class="container pt-5">
    <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-circle"></i> Thêm</button>
    <div class="modal" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm sách</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="add">
                        <div class="form-group">
                            <input type="text" class="form-control" name="newId" placeholder="ID">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="newTitle" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="newPrice" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="newAuthor" placeholder="Author">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="newYear" placeholder="Year">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="GET">
        <div class="form-group">
            <input class="form-control" value="<?php echo $keyWord ?>" name="search" style="max-width: 200px; display:inline-block;" placeholder="Tìm kiếm">
            <button type="submit" class="btn btn-default" style="margin-left:-50px"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Price</th>
                <th>Author</th>
                <th>Year</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($books as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $key ?></td>
                    <td><?php echo $value->title ?></td>
                    <td><?php echo $value->price ?></td>
                    <td><?php echo $value->author ?></td>
                    <td><?php echo $value->year ?></td>
                    <td>
                    <button class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i> Edit</button>
                    <div class="modal" id="editModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Chỉnh sửa thông tin sách</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="action" value="edit">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="editId" value="<?php echo $value->id ?>" placeholder="ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="editTitle" value="<?php echo $value->title ?>" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="editPrice" value="<?php echo $value->price ?>" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="editAuthor" value="<?php echo $value->author ?>" placeholder="Author">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="editYear" value="<?php echo $value->year ?>" placeholder="Year">
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $value->id ?>">
                        <button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                    </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include_once('footer.php');
?>