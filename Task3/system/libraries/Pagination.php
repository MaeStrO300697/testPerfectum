<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pagination Class
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Pagination
 * @author        maestro300697
 */
class CI_Pagination
{

    /**
     * Base URL
     *
     * The page that we're linking to
     *
     * @var $baseUrl string
     */
    protected $baseUrl = '';


    /**
     * Total number of elements
     *
     * @var $totalElements int
     */
    protected $totalElements = 0;

    /**
     * Number of links to show
     *
     * Relates to "digit" type links shown before/after
     * the currently viewed page.
     *
     * @var $numLinks int
     */
    protected $numLinks = 3;

    /**
     * Current page
     *
     * @var $curPage int
     */
    protected $curPage = 1;

    /**
     * Number of items to display on one page
     *
     * @var int $elementsForShow
     */
    protected $elementsForShow = 5;

    /**
     * Prefix after the base link
     * @var string $path
     */

    protected $path = '';

    /**
     * Method of constructing pagination
     * @var string $displayMethod
     */
    protected $displayMethod = 'bootstrap/4.5.0';

    /**
     * CI Singleton
     *
     * @var    object
     */
    protected $CI;

    // --------------------------------------------------------------------

    /**
     * Constructor
     * @return    void
     */
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->language('pagination');
        log_message('info', 'Pagination Class Initialized');
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return int
     */
    public function getTotalElements(): int
    {
        return $this->totalElements;
    }

    /**
     * @param int $totalElements
     */
    public function setTotalElements(int $totalElements)
    {
        $this->totalElements = $totalElements;
    }

    /**
     * @return int
     */
    public function getNumLinks(): int
    {
        return $this->numLinks;
    }

    /**
     * @param int $numLinks
     */
    public function setNumLinks(int $numLinks)
    {
        $this->numLinks = $numLinks;
    }

    /**
     * @return int
     */
    public function getCurPage(): int
    {
        return $this->curPage;
    }

    /**
     * @param int $curPage
     */
    public function setCurPage(int $curPage)
    {
        $this->curPage = $curPage;
    }

    /**
     * @return int
     */
    public function getElementsForShow(): int
    {
        return $this->elementsForShow;
    }

    /**
     * @param int $elementsForShow
     */
    public function setElementsForShow(int $elementsForShow)
    {
        $this->elementsForShow = $elementsForShow;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }


    /**
     * Generate the pagination links
     *
     * @return    string|null
     */
    public function createLinks()
    {
        if ($this->getTotalElements() <= 0) {
            throw new \InvalidArgumentException("Variable totalElements must be greater than zero");
        }
        if ($this->getTotalElements() < $this->getElementsForShow()) {
            return null;
        }
        $pagination = '<nav><ul class="pagination">';
        $amountPageLinks = ceil($this->getTotalElements() / $this->getElementsForShow());
        //Previous
        if ($this->getCurPage() > 1) {
            $page = $this->getCurPage() - 1;
            $pagination .= '<li class="page-item"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . $page . '">Previous</a></li>';
        }
        $prefix = 0;
        $postfix = 0;
        for ($i = 1; $i <= $amountPageLinks; $i++) {
            if ($this->getCurPage() != $i && ($amountPageLinks > $this->getNumLinks() + $this->getNumLinks())) {

                /////Формирование начала пагинации
                if ($i < $this->getCurPage() - $this->getNumLinks()) {
                    if ($prefix == 0) {
                        $pagination .= '<li class="page-item"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . '1">1</a></li>';
                        if ($this->getCurPage() - $this->getNumLinks() != 2) {
                            $pagination .= '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                        }
                        $prefix++;
                    }
                }
                ////////-------
                ///
                if ($i > $this->getCurPage() + $this->getNumLinks()) {
                    if ($postfix == 0) {
                        if ($this->getCurPage() + $this->getNumLinks() != $amountPageLinks - 1) {
                            $pagination .= '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                        }
                        $pagination .= '<li class="page-item"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . $amountPageLinks . '">' . $amountPageLinks . '</a></li>';
                        $postfix++;
                    }

                }
                if (($i >= $this->getCurPage() - $this->getNumLinks()) && ($i <= $this->getCurPage() + $this->getNumLinks())) {
                    $pagination .= '<li class="page-item"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . $i . '">' . $i . '</a></li>';
                }

            } else {
                if ($this->getCurPage() == $i) {
                    $pagination .= '<li class="page-item active"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . $i . '">' . $i . '</a></li>';
                }
                if ($amountPageLinks <= $this->getNumLinks() + $this->getNumLinks() && $this->getCurPage() != $i) {
                    $pagination .= '<li class="page-item"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . $i . '">' . $i . '</a></li>';
                }
                ////------------
                /*if ($i > $this->getCurPage() + $this->getNumLinks()) {
                    if ($postfix == 0) {
                        $pagination .= '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                        $pagination .= '<li class="page-item"><a class="page-link" href="' . $this->getBaseUrl() . $this->getPath() . $amountPageLinks . '">' . $amountPageLinks . '</a></li>';
                        $postfix++;
                    }

                }*/
                /////---------
            }
        }
        if ($this->getCurPage() != $amountPageLinks) {
            $page = $this->getCurPage() + 1;
            $pagination .= '<li class="page-item"><a class="page-link" href="'. $page .'">Next</a></li>';
        }

        $pagination .= '</ul></nav>';
        return $pagination;
    }


}
