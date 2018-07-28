<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT

CREATE TABLE `clinicalcustomer` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `clinic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `clinicalcustomer`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `clinicalcustomer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;COMMIT;


CREATE TABLE `pdflist` (
  `id` int(255) NOT NULL,
  `position` int(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `pdflist`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `pdflist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;
  
SQLTEXT;

$installer->run($sql);

$installer->endSetup();
	 