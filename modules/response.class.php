<?php
// 平順處理錯誤 CLASS
class Response
{
    private $_exceptions = array();
    private $_renderExceptions = false;
    public function setException(Exception $e)
    {
        $this->_exceptions[] = $e;
    }
    public function getExceptions()
    {
        return $this->_exceptions;
    }
    public function isException()
    {
        return !empty($this->_exceptions);
    }
    public function renderExceptions($flag = null)
    {
        if (null !== $flag) {
            $this->_renderExceptions = $flag ? true : false;
        }
        return $this->_renderExceptions;
    }
    public function sendResponse()
    {
        $a= "Header sending...\n";
        $exception = '';
        if ($this->isException() && $this->renderExceptions()) {
            foreach ($this->getExceptions() as $e) {
                $exception .= $e->getMessage() . "\n";
            }
            $a.= $exception;
        }
        $a.=  "Body sending...\n";
		return $a;
    }
} 
/*
	$response = new Response();
	$response->renderExceptions(true); // 讓 Exception 呈現出來
	try {
		// 這裡處理我們真正要執行的動作
		throw new Exception('TEST'); // 丟出一個測試用的例外
	} catch (Exception $e) {
		$response->setException($e); // 收集例外
	}
	if ($response->isException()) {
		// 可以在這裡記錄 Exception
	}
	$response->sendResponse(); // 顯示所有結果 (包含 Header, Exception, Body 等) 
*/
?>