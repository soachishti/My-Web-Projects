<?php

$sql = "SELECT name, type, sale_price, s.qty, s.total_tab, purchase_price, `datetime` FROM sale AS s JOIN medicine AS m ON s.m_id = m.id ORDER BY id DESC";