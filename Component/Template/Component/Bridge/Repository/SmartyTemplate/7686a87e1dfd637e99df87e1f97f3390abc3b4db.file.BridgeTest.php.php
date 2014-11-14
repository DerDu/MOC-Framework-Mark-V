<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-14 13:49:57
         compiled from "D:\WebProject\MOC-Framework-Mark-V\TestSuite\Tests\Component\Template\BridgeTest.php" */
?>
<?php /*%%SmartyHeaderCode:231175450cdff9e0161-87481245%%*/
if (!defined( 'SMARTY_DIR' )) {
    exit( 'no direct access allowed' );
}
$_valid = $_smarty_tpl->decodeProperties( array(
    'file_dependency'  =>
        array(
            '7686a87e1dfd637e99df87e1f97f3390abc3b4db' =>
                array(
                    0 => 'D:\\WebProject\\MOC-Framework-Mark-V\\TestSuite\\Tests\\Component\\Template\\BridgeTest.php',
                    1 => 1415967093,
                    2 => 'file',
                ),
        ),
    'nocache_hash'     => '231175450cdff9e0161-87481245',
    'function'         =>
        array(),
    'version'          => 'Smarty-3.1.21-dev',
    'unifunc'          => 'content_5450cdffaaf8f4_08072845',
    'has_nocache_code' => false,
), false ); /*/%%SmartyHeaderCode%%*/
?>
<?php if ($_valid && !is_callable( 'content_5450cdffaaf8f4_08072845' )) {
    function content_5450cdffaaf8f4_08072845( $_smarty_tpl )
    { ?><?php echo '<?php'; ?>

        namespace MOC\V\TestSuite\Tests\Component\Template;

        use MOC\V\Component\Template\Component\Bridge\Repository\SmartyTemplate;
        use MOC\V\Component\Template\Component\Bridge\Repository\TwigTemplate;
        use MOC\V\Component\Template\Component\Parameter\Repository\FileParameter;

        /**
        * Class BridgeTest
        *
        * @package MOC\V\TestSuite\Tests\Component\Template
        */
        class BridgeTest extends \PHPUnit_Framework_TestCase
{

        public function testTwigTemplate()
        {

        $Bridge = new TwigTemplate();

        $Bridge->loadFile( new FileParameter( __FILE__ ) );

        $Bridge->setVariable( 'Foo', 'Bar' );
        $Bridge->setVariable( 'Foo', array( 'Bar' ) );

        $Bridge->getContent();
        }

        public function testSmartyTemplate()
        {

        $Bridge = new SmartyTemplate();

        $Bridge->loadFile( new FileParameter( __FILE__ ) );

        $Bridge->setVariable( 'Foo', 'Bar' );
        $Bridge->setVariable( 'Foo', array( 'Bar' ) );

        $Bridge->getContent();
        }
        }
    <?php }
} ?>
