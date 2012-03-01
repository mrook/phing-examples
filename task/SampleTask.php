<?

class SampleTask extends Task
{
    private $var;
    
    public function setVar($v)
    {
        $this->var = $v;
    }
    
    public function main()
    {
        $this->log("value: " . $this->var);
    }
}