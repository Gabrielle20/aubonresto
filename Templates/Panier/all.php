<!DOCTYPE html>
<html lang="en">
<?php include './Templates/headHtml.html'; ?>


<body>
    <?php include('./Templates/nav.php');?>



    <div style="display:flex; justify-content: space-between;">
        <div class="leftSideBar">
            <?php include('./Templates/sidebar.php');?>
        </div>


        <div style="width:60%; margin: 0 auto; margin-top:10%;">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="rounded">
                        <div class="table-responsive table-borderless">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="toggle-btn">
                                                <div class="inner-circle"></div>
                                            </div>
                                        </th>
                                        <th>Commande #</th>
                                        <th>Client</th>
                                        <th>Statut</th>
                                        <th>Total</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php foreach($orders as $order): ?>
                                        <tr class="cell-1">
                                            <td class="text-center">
                                                <div class="toggle-btn">
                                                    <div class="inner-circle"></div>
                                                </div>
                                            </td>
                                            <td>#SO-13487</td>
                                            <td><?= $order['name_user'] ?> <?= $order['firstname_user'] ?></td>
                                            <td><span ><?= $order['statut_panier'] ?></span></td>
                                            <td><?= $order['total_panier'] ?> €</td>
                                            <td>Today</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include "./Templates/footerHtml.html"?>
</body>
</html>