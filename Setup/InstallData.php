<?php
namespace Vaimo\TestModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $_accountManagerFactory;
    protected $csv;
    protected $logger;
    protected $directoryList;
    protected $moduleReader;
    protected $filesystem;


    public function __construct(\Vaimo\TestModule\Model\AccountManagerFactory $accountManagerFactory,
                                \Magento\Framework\File\Csv $csv,
                                \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
                                \Magento\Framework\Module\Dir\Reader $moduleReader,
                                \Magento\Framework\Filesystem $filesystem,
                                \Psr\Log\LoggerInterface $logger)
    {
        $this->_accountManagerFactory = $accountManagerFactory;
        $this->csv = $csv;
        $this->logger = $logger;
        $this->directoryList = $directoryList;
        $this->moduleReader =  $moduleReader;
        $this->filesystem = $filesystem;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $path = $this->filesystem->getDirectoryRead('app')->getAbsolutePath();
        $managers = $this->csv->getData($path.'code/Vaimo/TestModule/Setup/account_managers.csv');
        $managersArray = array();
        foreach ($managers as $value) {
            if ($value[0] == "Postal Sector") {
                continue;
            } else {
                if (!array_key_exists($value[1], $managersArray)) {
                    $managersArray[$value[1]] = array();
                    $managersArray[$value[1]][] = [$value[0]];
                } else {
                    $managersArray[$value[1]][] = [$value[0]];
                }
            }
        }
        foreach ($managersArray as $manager => $data) {
            $postal_section_array = array();
            foreach ($data as $value) {
                array_push($postal_section_array, $value[0]);
            }
            $postal_section = implode(",", $postal_section_array);
                $row = [
                    'postal_section' => $postal_section,
                    'account_manager' => $manager
                ];
                $this->_accountManagerFactory->create()->addData($row)->save();
        }
    }
}