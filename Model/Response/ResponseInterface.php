<?php
/**
 * Created by Qoliber
 *
 * @category    Ari10
 * @package     Ari10_MonedaPayLib
 * @author      qoliber <info@qoliber.com>
 */

declare(strict_types = 1);

namespace Ari10\MonedaPayLib\Model\Response;

use Ari10\MonedaPayLib\Model\ArrayableInterface;
use Ari10\MonedaPayLib\Model\DataProvider\ProvidableDataObjectInterface;

interface ResponseInterface extends ArrayableInterface,
    ProvidableDataObjectInterface
{
}
