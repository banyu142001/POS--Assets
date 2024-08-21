<?php foreach ($data_cart as $cart) : ?>
    <tr>
        <td class="fw-normal kode_produk p-2" style="font-size:13px;"> <strong><?= $cart['kode_produk'] ?></strong></td>
        <td class="fw-normal p-2" style="font-size:15px;"><?= $cart['nama_produk'] ?></td>
        <td class="fw-normal p-2" style="font-size:14px;"><?= $cart['harga_data_cart'] ?></td>
        <td class="fw-normal p-2" style="font-size:14px;"><?= $cart['qty_data_cart'] ?></td>
        <td class="fw-normal p-2" style="font-size:14px;"><?= $cart['diskon_data_cart'] ?></td>
        <td class="fw-normal p-2" style="font-size:14px;" id="total_cart"><?= $cart['total_data_cart'] ?></td>
        <td class="align-middle text-center p-1" style="font-size:10px;">
            <div class="btn-toolbar my-0" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group my-0" role="group" aria-label="First group">
                    <a id="update_cart" class="btn btn-sm p-0 px-2  rounded-1 mx-1 cursor-pointer my-0 border hover " <?= text_success ?> data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id_cart="<?= $cart['id_cart'] ?>" data-kode_produk="<?= $cart['kode_produk'] ?>" data-stok="<?= $cart['stok'] ?>" data-nama_produk="<?= $cart['nama_produk'] ?>" data-harga="<?= $cart['harga_data_cart'] ?>" data-qty="<?= $cart['qty_data_cart'] ?>" data-diskon="<?= $cart['diskon_data_cart'] ?>" data-total="<?= $cart['total_data_cart'] ?>">
                        <div class="far fa-edit"></div>
                    </a>
                    <a id="del_cart" class="btn btn-sm  p-0 px-2 rounded-1 cursor-pointer my-0 border " data-id_cart="<?= $cart['id_cart'] ?>" class="text-xs " <?= text_danger ?>>
                        <div class="fas fa-trash"></div>
                    </a>
                </div>
        </td>
    </tr>
<?php endforeach ?>