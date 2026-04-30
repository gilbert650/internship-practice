const express =require('express');
const router =express.Router();
const userContoller =require('../Contollers/usercontroller');



router.get("/view",userContoller.getAlluser)
router.delete("/delete:id",userContoller.getAlluser)
router.put("edit/:id",userContoller.getAlluser)
router.post("/:signup",userContoller.getAlluser)

module.export = router;