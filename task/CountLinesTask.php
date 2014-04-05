<?php

require_once 'phing/Task.php';

class CountLinesTask extends Task
{
    private $_filesets = array();

    /**
     * Creator for _filesets
     * 
     * @return FileSet
     */
    public function createFileset()
    {  
        $num = array_push($this->_filesets, new FileSet());
        return $this->_filesets[$num-1];
    }

    public function main()
    {
        $foundEmpty = false;
        
        foreach ($this->_filesets as $fileset) {
            $files = $fileset->getDirectoryScanner($this->project)
                ->getIncludedFiles();
            $dir = $fileset->getDir($this->project)->getAbsolutePath();

            foreach ($files as $file) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $file);
                $lines = count(file($path));
                
                $this->log($path . ": " . $lines . " line(s)");

                if ($lines == 0) {
                    $foundEmpty = true;
                }
            }
        }

        if ($foundEmpty) {
            throw new BuildException("One or more files have zero lines");
        }
    }
}
