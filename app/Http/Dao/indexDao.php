package com.ibicnCloud.action.fiance;
import java.util.*;
import com.ibicnCloud.ENUM.*;
import com.ibicnCloud.action.BaseAction;
import com.ibicnCloud.util.*;
/**
 * 的Action类
 *
 * @author MDA
 */
public class indexDaoAction extends BaseAction<indexDao> {
    /**
     * 前台在模型数据
     */
    private indexDao data = this.getModel();
    /**
     * 常规列表页面
     */
    public String list() {

    }
    public String save() {
      
        return "save";
    }
    public String saveOK() {
 ·
        return "errorPage";
    }
    public String update() {
      
        return "errorPage";
    }
}